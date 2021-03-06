<?php if (comments_open()) { ?>
    <h3 class="comments-caption"><a name="comments"><?php comments_number('Комментарии', '1 комментарий', '% комментариев'); ?></a></h3>
    <?php if (get_comments_number() == 0) { ?>
        <ul class="list">
            <li>Оставьте первый комментарий - автор старался</li>
        </ul>
        <?php
        $fields = array(
            'author' => '<p class="comment-form-author"><label for="author">' . __( 'Name' ) . ($req ? '<span class="required">*</span>' : '') . '</label><input type="text" id="author" name="author" class="author" value="' . esc_attr($commenter['comment_author']) . '" placeholder="" pattern="[A-Za-zА-Яа-я]{3,}" maxlength="30" autocomplete="on" tabindex="1" required' . $aria_req . '></p>',
            'email' => '<p class="comment-form-email">
            <label for="email">' . __( 'Email') . ($req ? '<span class="required">*</span>' : '') . '</label>
            <input type="email" id="email" name="email" class="email" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="example@example.com" maxlength="30" autocomplete="on" tabindex="2" required' . $aria_req . '></p>'
        );

        $args = array(
            'comment_notes_after' => '',
            'comment_field' => '<p class="comment-form-comment">
                <label for="comment">' . _x( 'Comment', 'noun' ) . '</label>
                <textarea id="comment" name="comment" class="comment-form" cols="150" rows="8" aria-required="true" placeholder="Текст сообщения..."></textarea></p>',
            'label_submit' => 'Отправить',
            'fields' => apply_filters('comment_form_default_fields', $fields)
        );
        comment_form($args);

        ?>
    <?php } else { ?>
        <?php
        $fields = array(
            'author' => '<p class="comment-form-author"><label for="author">' . __( 'Name' ) . ($req ? '<span class="required">*</span>' : '') . '</label><input type="text" id="author" name="author" class="author" value="' . esc_attr($commenter['comment_author']) . '" placeholder="" pattern="[A-Za-zА-Яа-я]{3,}" maxlength="30" autocomplete="on" tabindex="1" required' . $aria_req . '></p>',
            'email' => '<p class="comment-form-email">
            <label for="email">' . __( 'Email') . ($req ? '<span class="required">*</span>' : '') . '</label>
            <input type="email" id="email" name="email" class="email" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="example@example.com" maxlength="30" autocomplete="on" tabindex="2" required' . $aria_req . '></p>'
        );

        $args = array(
            'comment_notes_after' => '',
            'comment_field' => '<p class="comment-form-comment">
                <label for="comment">' . _x( 'Comment', 'noun' ) . '</label>
                <textarea id="comment" name="comment" class="comment-form" cols="150" rows="8" aria-required="true" placeholder="Текст сообщения..."></textarea></p>',
            'label_submit' => 'Отправить',
            'fields' => apply_filters('comment_form_default_fields', $fields)
        );
        comment_form($args);

        ?>

        <ul class="commentlist">
            <?php
            function verstaka_comment($comment, $args, $depth){
            $GLOBALS['comment'] = $comment; ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
                <div class="clearfix" id="comment-<?php comment_ID(); ?>">
                    <div class="comment-author vcard">

                        <div class="avota">
                        <?php echo get_avatar($comment,$size='150',$default='<path_to_url>' ); ?>
                        <br/>
                        </div>
                    </div>
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em><?php _e('Ваше комментарий на модерации') ?></em>
                        <br>
                    <?php endif; ?>
                            <div class="comtext">
                                <?php printf(__('@<cite class="fn">%s</cite> <span class="says">пишет:</span>'), get_comment_author_link()) ?>
                    <?php comment_text() ?>
                    <div class="reply">
                        <span><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></span>
                        | <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </div>
                                </div>
                </div>
                <?php }
                $args = array(
                    'reply_text' => 'Ответить',
                    'callback' => 'verstaka_comment',
                    'style' => 'li',
                    'avatar_size' => '150',
                    'reverse_top_level' => true,
                    'reverse_children' => true
                );
                wp_list_comments($args);
                ?>
        </ul>
    <?php } ?>

<?php } else { ?>
    <h3>Обсуждения закрыты для данной страницы</h3>
<?php }
?>