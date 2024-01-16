<template>
  <ElAlert v-if="form.hasErrors" title="Invalid filters" type="error">
    <ul class="form__errors">
      <li v-for="(text, key) in form.errors">
        <b>{{ key.replace('filters.', '') }}: </b>{{ text.replace(/.*field (.*)/, '$1') }}
      </li>
    </ul>
  </ElAlert>
</template>

<script setup>
import { ElAlert } from 'element-plus';

defineProps({ form: Object });
</script>

<style scoped>
.form__errors {
  padding-left: 0px;
}
</style>
