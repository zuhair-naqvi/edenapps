<?php use_helper('I18N') ?>
<style>
body
{
	font-family: Arial;
	color: #3d3644;
}

.signinform
{
margin-top: 270px;
margin-left: auto;
margin-right: auto;
}
</style>
<center>
<br/>
<br/>
<br/>
<div id="signinform">
<h1>Eden Apps Secure Login</h1>
<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" >
  <table>
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2" align="center">
        <br/>
          <input type="submit" value="<?php echo __('Signin', null, 'sf_guard') ?>" />
          
          <?php $routes = $sf_context->getRouting()->getRoutes() ?>
          <?php if (isset($routes['sf_guard_forgot_password'])): ?>
            <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
          <?php endif; ?>

          <?php if (isset($routes['sf_guard_register'])): ?>
            &nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
          <?php endif; ?>
        </td>
      </tr>
    </tfoot>
  </table>
</form>
</div>
</center>
