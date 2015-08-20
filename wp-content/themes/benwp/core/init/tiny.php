<?php

// TinyMCE

//add_editor_style( get_template_directory_uri() . '/css/bootstrap.min.css' );
//add_editor_style( get_template_directory_uri() . '/css/editor-style.css' );

function ben_teeny_editor($mceInit) {
    $mceInit['toolbar1']='undo,redo,bold,italic,underline,bullist,numlist,blockquote,link,unlink,spellchecker,image';
    $mceInit['toolbar2']='pastetext,removeformat,alignleft,aligncenter,alignright,alignjustify,charmap,outdent,indent,dropcap';

    return $mceInit;
}
//add_filter('tiny_mce_before_init', 'ben_teeny_editor');

?>