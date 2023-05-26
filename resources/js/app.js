import "./bootstrap";

import "@fortawesome/fontawesome-free/scss/fontawesome.scss";
import "@fortawesome/fontawesome-free/scss/brands.scss";
import "@fortawesome/fontawesome-free/scss/regular.scss";
import "@fortawesome/fontawesome-free/scss/solid.scss";
import "@fortawesome/fontawesome-free/scss/v4-shims.scss";

import jQuery from "jquery";
window.$ = jQuery;

window.onload = function () {
    $(".loading").fadeToggle("fast");
};

window.btnLoad = function () {
    $(".btn").prop("disabled", true);
    $(".btn").addClass("btn-outline-light");
    $(".btn").html(
        `<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>  Cargando`
    );
};
