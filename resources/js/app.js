import './bootstrap';

import Alpine from 'alpinejs';
import Swal from 'sweetalert2';
import axios from 'axios';
window.Swal = Swal;
window.axios = axios;
window.Alpine = Alpine;

Alpine.start();
