
<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
    <div class="alert alert-info"><?php _e("This post is password protected. Enter the password to view comments.",LANGUAGE); ?></div>
    <?php
    return;
}
?>
<div class="blog-comment">
<?php    wp_list_comments( array(
        'walker' => new viska_walker_comment(),
        'avatar_size' => 270
    ) );

?>
</div>
<div class="blog-leave-reply">
<?php if ( comments_open() ) : ?>

    <?php
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $defaults = array(
        'fields' => apply_filters( 'comment_form_default_fields', array(
                'author' =>'<div class="col-ms-12 col-xs-6"><input id="author" autocomplete="off" name="author" type="text" '. $aria_req . ' placeholder="Nombre" /></div>',
                'email' =>'<div class="col-ms-12 col-xs-6"><input autocomplete="off" id="email" name="email" type="text" ' . $aria_req . ' placeholder="Correo electrónico" /></div>'
            )
        ),
        'comment_field' =>  '<div class="clear"></div><div class="col-ms-12 col-xs-12"><textarea id="comment" name="comment" aria-required="true" placeholder="Comentario"></textarea></div><div class="clear"></div>',
        'must_log_in' => '<div class="must-log-in control-group"><div class="controls">' .sprintf(__( 'You must be <a href="%s">logged in</a> to post a comment.' ),wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )) . '</div></div >',
        'logged_in_as' => '<div class="logged-in-as control-group"><div class="controls">' .sprintf(__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),admin_url( 'profile.php' ),$user_identity,wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )) . '</div></div>',

        'comment_notes_before' => '<div class="comment-notes control-group"><div class="controls">' .__( 'Your email address will not be published.' ) .'</div></div>',

        'comment_notes_after' => '',

        'id_form'              => 'commentform',

        'id_submit'            => 'submit',

        'title_reply'          => __( 'Deja tu comentario aquí',LANGUAGE ),

        'title_reply_to'       => __( 'Deja tu respuesta %s',LANGUAGE ),

        'cancel_reply_link'    => __( 'Cancelar',LANGUAGE ),

        'label_submit'         => __( 'Enviar',LANGUAGE ),

    );

    comment_form($defaults);
    ?>

<?php endif; // if you delete this the sky will fall on your head ?>
</div>
<script type="text/javascript">
function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}
  jQuery('document').ready(function($){
    // Get the comment form
    var commentform=$('#commentform');
    // Add a Comment Status message
    commentform.append('<div id="comment-status" ></div>');
    // Defining the Status message element 
    var statusdiv=$('#comment-status');
    commentform.submit(function(){
      // Serialize and store form data
      var formdata=commentform.serialize();
      //Add a status message
      statusdiv.html('<p class="ajax-placeholder">Procesando...</p>');
      //Extract action URL from commentform
      var formurl=commentform.attr('action');
      //Post Form with data
      $.ajax({
        type: 'post',
        url: formurl,
        data: formdata,
        error: function(XMLHttpRequest, textStatus, errorThrown){
          statusdiv.html('<p class="ajax-error" >Se ha presentado un error al enviar la información, por favor intenta nuevamente.</p>');
        },
        success: function(data, textStatus){
          if(textStatus=="success")
		  {	
			if(commentform.find('textarea[name=comment]').val().length == 0 || commentform.find('input[name=author]').val().length == 0 || commentform.find('input[name=email]').val().length == 0 || !validateEmail(commentform.find('input[name=email]').val()))
			{
				statusdiv.html('<p class="ajax-error" >Por favor completa todos los campos para continuar.</p>');
				
				if(commentform.find('input[name=email]').val().length > 0)
					if(!validateEmail(commentform.find('input[name=email]').val()))
					{
						statusdiv.html('<p class="ajax-error" >El correo ingresado no es válido.</p>');
						commentform.find('input[name=email]').val('');
					}				
			}
			else
			{
				statusdiv.html('<p class="ajax-ok" >¡Gracias por tu comentario! Estará visible una vez sea aprobado.</p>');
				commentform.find('textarea[name=comment]').val('');
				commentform.find('input[name=author]').val('');
				commentform.find('input[name=email]').val('');
			}
		  }
          else
		  {
			commentform.find('textarea[name=comment]').val('');
			commentform.find('input[name=author]').val('');
			commentform.find('input[name=email]').val('');
			statusdiv.html('<p class="ajax-error" >Por favor completa todos los campos para continuar.</p>');
		  }
        }
      });
      return false;
    });
  });
</script>