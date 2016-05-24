<?php

namespace Drupal\ts_status_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'TsBlock' block.
 *
 * @Block(
 * id = "ts_block",
 * admin_label = @Translation("Ts block"),
 * )
 */

class TsBlock extends BlockBase{

	public function build() {
		$config = \Drupal::config('ts_status_block.settings');
		
		$ip = $config->get('ip_message');
		$port = $config->get('port_message');
		$background = $config->get('background');
		$server_info_background = $config->get('server_info_background');
		$server_info_text = $config->get('server_info_text');
		$server_name_background = $config->get('server_name_background');
		$server_name_text = $config->get('server_name_text');
		$info_background = $config->get('info_background');
		$channel_background = $config->get('channel_background');
		$channel_text = $config->get('channel_text');
		$username_background = $config->get('username_background');
		$username_text = $config->get('username_text');
		
		
	  return array(
	    '#title' => 'Team speak server status',
	    '#description' => 'Lorem ipsum dolar sum amet ..',
	    '#markup' => $this->t('<span id="its318189"><a href="http://www.teamspeak3.com/">teamspeak server</a> Hosting by TeamSpeak3.com</span><script type="text/javascript" src="http://view.light-speed.com/teamspeak3.php?IP='.$ip.'&PORT='.$port.'&QUERY=10011&UID=318189&display=block&font=11px&background='.$background.'&server_info_background='.$server_info_background.'&server_info_text='.$server_info_text.'&server_name_background='.$server_name_background.'&server_name_text='.$server_name_text.'&info_background='.$info_background.'&channel_background='.$channel_background.'&channel_text='.$channel_tex.'&username_background='.$username_background.'&username_text='.$username_text.'"></script>'),

		/*return array(
	    '#title' => 'Team speak server status',
	    '#description' => 'Lorem ipsum dolar sum amet ..',
	    '#markup' => $this->t('<span id="its179887"><a href="http://www.teamspeak3.com/">teamspeak server</a> Hosting by TeamSpeak3.com</span><script type="text/javascript" src="http://view.light-speed.com/teamspeak3.php?IP=195.154.82.16&PORT=9988&QUERY=10011&UID=179887&display=block&font=11px&background=blue&server_info_background=transparent&server_info_text=%23ffffff&server_name_background=red&server_name_text=blue&info_background=transparent&channel_background=transparent&channel_text=%23ffffff&username_background=transparent&username_text=%23ffffff"></script>'),*/
	  );
	}
}
