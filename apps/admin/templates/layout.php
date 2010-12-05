<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
<br/>
    <p align="right" style="font-family:arial;font-size:12px">
    <?php if($sf_user->getGuardUser()): ?>
        <div style="float:left;clear:right;margin-left:70px;font-family:arial">
<br/>
<h1 style="font-size:24px;color:#3d3644">EdenApps Management Console</h1>
<br/>

     	<a tabindex="0" href="#" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="sf_admin_button1">
      	  <span class="ui-icon ui-icon-carat-1-e"></span>
      	  Content      	</a>
        <a tabindex="0" href="#" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="sf_admin_button2">
          <span class="ui-icon ui-icon-carat-1-e"></span>
          Members           </a>      
        <a tabindex="0" href="#" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="sf_admin_button3">
          <span class="ui-icon ui-icon-carat-1-e"></span>
          Reservations           </a>
        <a tabindex="0" href="#" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="sf_admin_button4">
          <span class="ui-icon ui-icon-carat-1-e"></span>
          Events           </a>
        <a tabindex="0" href="#" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="sf_admin_button5">
          <span class="ui-icon ui-icon-carat-1-e"></span>
          Push Notifications           </a>
        <a tabindex="0" href="#" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="sf_admin_button6">
          <span class="ui-icon ui-icon-carat-1-e"></span>
         Venue Statistics           </a>
        <a tabindex="0" href="#" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="sf_admin_button7">
          <span class="ui-icon ui-icon-carat-1-e"></span>
          Sponsor Dashboard (Global Statistics)          </a>  
</div>
<div style="float:right;clear:left;font-family:arial;font-size:12px">
    Welcome <?php echo $sf_user->getGuardUser()->getUsername(); ?>
    <input type="button" value="Sign Out" onclick="window.location='/admin.php/logout'" style="margin-right: 70px"/>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
  <?php endif; ?>  
   </p>
    <?php echo $sf_content ?>
  </body>
</html>
