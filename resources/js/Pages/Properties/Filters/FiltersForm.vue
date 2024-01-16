<template>
  <ElCard class="box-card form">
    <template #header>
      <div class="card-header">
        <h3>Filters</h3>
      </div>
    </template>

    <ElForm label-position="left" label-width="100px">
      <ElFormItem label="Name">
        <ElInput v-model="name" class="form__input" />
      </ElFormItem>
      <ElFormItem label="Price">
        <ElInputNumber v-model="price" controls-position="right" min="0" class="form__input form__input--number" />
      </ElFormItem>
      <ElFormItem label="Bedrooms">
        <ElInputNumber v-model="bedrooms" controls-position="right" min="0" class="form__input form__input--number" />
      </ElFormItem>
      <ElFormItem label="Bathrooms">
        <ElInputNumber v-model="bathrooms" controls-position="right" min="0" class="form__input form__input--number" />
      </ElFormItem>
      <ElFormItem label="Storeys">
        <ElInputNumber v-model="storeys" controls-position="right" min="0" class="form__input form__input--number" />
      </ElFormItem>
      <ElFormItem label="Garages">
        <ElInputNumber v-model="garages" controls-position="right" min="0" class="form__input form__input--number" />
      </ElFormItem>
    </ElForm>

    <template #footer>
      <div class="form__footer">
        <ElButton type="primary" size="large" class="form__submit">Update</ElButton>
      </div>
    </template>
  </ElCard>
</template>

<script setup>
import { ElButton, ElCard, ElForm, ElFormItem, ElInput, ElInputNumber } from 'element-plus';
import { ref } from 'vue';

const name = ref('');
const price = ref();
const bedrooms = ref();
const bathrooms = ref();
const storeys = ref();
const garages = ref();
</script>

<style scoped lang="scss">
.form {
  .form__input {

    &--number {
      width: 100%;
    }
  }

  .form__footer {
    display: flex;
    justify-content: end;

    @media screen and (max-width: 1280px) {
      justify-content: center;
    }
  }
}
</style>
