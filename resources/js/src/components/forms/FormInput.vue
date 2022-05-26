<template>
    <div class="lm-cms-form-input-container">
        <label for="input-live">{{ title }}</label>
        <div>
            <b-form-input @input="$emit('input', input)" v-model="input" />
        </div>
    </div>
</template>

<style>
.lm-cms-form-input-container {
    padding: 5px;
}
</style>

<script>
export default {
    name: "FormInput",

    props: {
        title: {
            type: String,
            default: "Label",
        },
    },

    data() {
        return {
            input: null,
        };
    },
};
</script>
