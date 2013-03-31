<?php

// extend regular File Resource to suggest a source must be recompiled on every invocation
class RecompilingFileResource extends Smarty_Internal_Resource_File {
    public function populate(Smarty_Template_Source $source, Smarty_Internal_Template $_template=null) {
        parent::populate($source, $_template);
        $source->recompiled = true;
    }
}