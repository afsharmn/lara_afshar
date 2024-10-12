import * as FilePond from 'filepond';

window.FilePond = FilePond;

// const locale = 'import.meta.env.APP_FILEPOND_LOCALE';

// if(locale === 'fa_ir'){
//     import fa_ir from 'filepond/locale/fa_ir';
//     FilePond.setOptions(fa_ir);
// }else if(locale === 'en-en'){
//     import en from 'filepond/locale/en-en';
//     FilePond.setOptions(en);
// }

import fa_ir from 'filepond/locale/fa_ir';
FilePond.setOptions(fa_ir);


//-------------------------------------------------------------------------------
// Import the plugin code
import FilePondPluginFilePoster from 'filepond-plugin-file-poster';
// Import the plugin styles
import 'filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css';
// Register the plugin
FilePond.registerPlugin(FilePondPluginFilePoster);

//-------------------------------------------------------------------------------
// Import the plugin code
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
// Register the plugin
FilePond.registerPlugin(FilePondPluginFileValidateSize);

//-------------------------------------------------------------------------------
// Import the plugin code
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type'
// Register the plugin
FilePond.registerPlugin(FilePondPluginFileValidateType);


//-------------------------------------------------------------------------------
// Import the plugin code
import FilePondPluginImageCrop from 'filepond-plugin-image-crop';
// Register the plugin
FilePond.registerPlugin(FilePondPluginImageCrop);


//-------------------------------------------------------------------------------
// Import the plugin code
import FilePondPluginImageExifOrientation from 'filepond-plugin-image-exif-orientation';
// Register the plugin
FilePond.registerPlugin(FilePondPluginImageExifOrientation);


//-------------------------------------------------------------------------------
// Import the plugin code
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
// Import the plugin styles
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';
// Register the plugin
FilePond.registerPlugin(FilePondPluginImagePreview);


//-------------------------------------------------------------------------------
// Import the plugin code
import FilePondPluginImageResize from 'filepond-plugin-image-resize';
// Register the plugin
FilePond.registerPlugin(FilePondPluginImageResize);

