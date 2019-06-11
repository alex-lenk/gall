<?php
/**
* Класс vk для постинга в соответствующую соцсеть.
* @copyright  Copyright (c) 2016 devPastet (Pavel Karelin) devpastet@yandex.ru
*/
class vk extends socials
{
	
	/**
     * @var array
    */
	public $vkKeys;
	
	public function __construct(modX & $modx, $setting) 
	{
		$this->modx = $modx;
		$this->setting = $setting;
		
		$this->vkKeys['owner_id'] = trim($this->modx->getOption('msocial_vk_id'));
		$this->vkKeys['access_token'] = trim($this->modx->getOption('msocial_vk_at'));	
		$this->vkKeys['from_group'] = trim($this->modx->getOption('msocial_im_fg'));
		$this->vkKeys['message'] = $this->setting['message'];	
		
	}
	
	/**
     * Метод для постинга
     */
	public function posting()
	{
		$param = $this->vkKeys;
		if(isset($this->setting['attach']) AND $this->modx->getOption('msocial_im_ps') == 1)
		{
			$count = 1;
			foreach($this->setting['attach'] as $file)
			{
				if($count <= 4)
				{
					if (version_compare(phpversion(), '5.5.0', '<')) {
						$attrImg['file'.$count] = '@'.MODX_BASE_PATH.$file;
					}else{
						$attrImg['file'.$count] = new CURLFile(MODX_BASE_PATH.$file);
					}
				}
				$count++;
			}
			$imgList = $this->uploadImg($attrImg);
			if($imgList){
				foreach($this->uploadImg($attrImg) as $img){
					$attachments .= $img->id.',';
				}
				$param['attachments'] = substr($attachments, 0, -1);
			}
			
		}
		
		$return =  $this->request('https://api.vk.com/method/wall.post',$param);
		
		/* Вызываем обработчик ошибок */
		if(isset($return->error)){
			$errorMsg = $return->error->error_code.' ('.$return->error->error_msg.')';
			$this->modx->log(modX::LOG_LEVEL_ERROR, $this->modx->lexicon('msocial_error_posting').' Vk '.$errorMsg);
		}
	}
	
	/**
     * Загрузка изображений
	 * $file array массив файлов
     */
	public function uploadImg($file)
	{
		$group_id = $this->vkKeys['owner_id'];
		if($group_id[0] == '-'){
			$group_id = substr($group_id, 1);
		}
		
		$server = $this->request('https://api.vk.com/method/photos.getWallUploadServer', array(
			'group_id' => $group_id,
			'access_token' => $this->vkKeys['access_token']
		));
		
		$vkPhoto = $this->request($server->response->upload_url, $file);
		
		$result = $this->request('https://api.vk.com/method/photos.saveWallPhoto', array(
			'group_id' => $group_id,
			'photo' => $vkPhoto->photo, 
			'server' => $vkPhoto->server, 
			'hash' => $vkPhoto->hash,
			'access_token' => $this->vkKeys['access_token']
		));
		
		return $result->response;
	}
}
?>