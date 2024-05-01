var jQuery = require('jquery');
var $ = jQuery;
window.jQuery = jQuery;
window.$ = jQuery;
// require('moment');
const persianDate = window.persianDate = require('persian-date');
// require('tinymce');
var scrollpup = require('scrollpup');
window.scrollpup = scrollpup;
require('persian-datepicker/dist/js/persian-datepicker');
// Initialization for ES Users
import {
    Collapse,
    initTE,
} from "tw-elements";

initTE({ Collapse });

require('awesomplete/awesomplete');
