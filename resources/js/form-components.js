'use strict';

import Vue from "vue";

import FormInput from 'src/components/forms/FormInput';
import Modal from 'src/components/modal/Modal';

let components = {
    FormInput,
    Modal
}

Object.keys(components).forEach(key => Vue.component(key, components[key]));
