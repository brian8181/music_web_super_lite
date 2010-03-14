<?php /* Smarty version 2.6.20, created on 2010-02-07 13:24:19
         compiled from toolbar_items.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'toolbar_items.tpl', 1, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "music.conf"), $this);?>

<?php if (isset ( $this->_config[0]['vars']['enable_advanced'] ) && $this->_config[0]['vars']['enable_advanced'] == true): ?>
	 <li>
       <a class="Nav" href="adv_query.php">Advanced</a>
    </li>
<?php endif; ?>
<?php if ($this->_config[0]['vars']['enable_browse'] == true): ?>
	<li>
       <a class="Nav" href="browse_artist.php?nav_row=0">Browse</a>
    </li>
<?php endif; ?>
<?php if ($this->_config[0]['vars']['enable_playlist'] == true): ?>
    <li>
       <a class="Nav" href="playlists.php">Playlists</a>
     </li>
<?php endif; ?>
<?php if ($this->_config[0]['vars']['enable_statistics'] == true): ?>
	 <li>
       <a class="Nav" href="music_stats.php">Statistics</a>
     </li>
<?php endif; ?>
<?php if ($this->_config[0]['vars']['enable_quick_search'] == true): ?>
	 <li>
        <form name="toolbar" onsubmit="on_quick_submit(toolbar)" method="get" action="results.php">
          <input type="hidden" name="artist" />
          <input type="hidden" name="title" />
          <input type="hidden" name="and" value="false" />
          <div class="white" style="text-align: center">
            <strong>
              <em>Quick Search:</em>
            </strong>&nbsp;
            <input type="text" name="album" align="right"/>
          </div>
        </form>
      </li>
<?php endif; ?>