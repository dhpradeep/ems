CKEDITOR.editorConfig = function(config) {
    config.toolbarGroups = [
        { name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
        { name: 'insert', groups: ['insert', 'mathjax'] },
        { name: 'document', groups: ['mode'] }
    ];

    config.extraPlugins = 'mathjax';
    config.mathJaxClass = 'my-math';
    config.mathJaxLib = '../js/mathjax/MathJax.js?config=TeX-AMS_HTML';

    config.removeButtons = 'PageBreak,HorizontalRule,Table,Preview,Smiley,NewPage,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Scayt,Form,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Flash,Image,Iframe,ShowBlocks,About,Radio,Checkbox,Save';
};