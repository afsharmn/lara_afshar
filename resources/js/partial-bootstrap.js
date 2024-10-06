import axios from 'axios';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

//importing jquery library
import './jquery-global.js';

//importing bootstrap library
import './bootstrap-5.js';

import Toastify from 'toastify-js'
window.Toastify = Toastify;

