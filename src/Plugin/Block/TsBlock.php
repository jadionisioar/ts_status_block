<?php

namespace Drupal\ts_status_block\Plugin\Block;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'TsBlock' block.
 *
 * @Block(
 * id = "ts_block",
 * admin_label = @Translation("Ts block"),
 * )
 */

class TsBlock extends BlockBase implements ConfigFactoryInterface{

	protected $configFactory;

	public function __construct(ConfigFactoryInterface $config_factory) {
    //$this->configFactory = $config_factory;
	echo get_class($config_factory);
  }
	public function build() {
		//$ip = $this->configFactory->get('ip_message');
		
	  return array(
	    '#title' => 'Team speak server status',
	    '#description' => 'Lorem ipsum dolar sum amet ..',
	    '#markup' => $this->t('<span id="its763711"><a href="http://www.teamspeak3.com/">teamspeak</a> Hosting by TeamSpeak3.com</span><script type="text/javascript" src="http://view.light-speed.com/teamspeak3.php?IP='.$ip.'&PORT=9988&QUERY=10011&UID=763711&display=none&font=11px&background=transparent&server_info_background=transparent&server_info_text=%23000000&server_name_background=transparent&server_name_text=%23000000&info_background=transparent&channel_background=transparent&channel_text=%23000000&username_background=transparent&username_text=%23000000"></script>'),
	  );
	}
}
