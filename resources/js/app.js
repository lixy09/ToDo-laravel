import './bootstrap';
import $ from 'jquery';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        "X-Requested-With": "XMLHttpRequest"
    }
});
