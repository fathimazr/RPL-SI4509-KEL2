import './bootstrap';

import Alpine from 'alpinejs';
import Swal from 'sweetalert2';
import jQuery from 'jquery';

window.Alpine = Alpine;
window.Swal = Swal;
window.$ = window.jQuery = require('jquery');

Alpine.start();