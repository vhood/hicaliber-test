<template>
  <ElCard class="box-card form">
    <template #header>
      <div class="card-header">
        <h3>Filters</h3>
      </div>

      <FiltersError :form="form" />
    </template>

    <ElForm label-position="left" label-width="100px">
      <ElFormItem label="Name">
        <ElInput v-model="form.name" class="form__input" />
      </ElFormItem>

      <ElFormItem label="Price">
        <div class="form__price">
          <ElInputNumber
            v-model="form.price_min"
            placeholder="min"
            controls-position="right"
            :min="0"
            class="form__input form__input--price"
          />
          <ElInputNumber
            v-model="form.price_max"
            placeholder="max"
            controls-position="right"
            :min="0"
            class="form__input form__input--price"
          />
        </div>
      </ElFormItem>

      <ElFormItem label="Bedrooms">
        <ElInputNumber
          v-model="form.bedrooms"
          controls-position="right"
          :min="0"
          class="form__input form__input--number"
        />
      </ElFormItem>

      <ElFormItem label="Bathrooms">
        <ElInputNumber
          v-model="form.bathrooms"
          controls-position="right"
          :min="0"
          class="form__input form__input--number"
        />
      </ElFormItem>

      <ElFormItem label="Storeys">
        <ElInputNumber
          v-model="form.storeys"
          controls-position="right"
          :min="0"
          class="form__input form__input--number"
        />
      </ElFormItem>

      <ElFormItem label="Garages">
        <ElInputNumber
          v-model="form.garages"
          controls-position="right"
          :min="0"
          class="form__input form__input--number"
        />
      </ElFormItem>
    </ElForm>

    <template #footer>
      <div class="form__footer">
        <ElButton type="primary" size="large" class="form__submit" @click.prevent="submit" :loading="form.processing">
          Update
        </ElButton>
      </div>
    </template>
  </ElCard>
</template>

<script setup>
import { ElButton, ElCard, ElForm, ElFormItem, ElInput, ElInputNumber } from 'element-plus';
import { router, useForm } from '@inertiajs/vue3';
import FiltersError from './FiltersError.vue';

const form = useForm({
  name: null,
  price_min: null,
  price_max: null,
  bedrooms: null,
  bathrooms: null,
  storeys: null,
  garages: null,
});

const emit = defineEmits(['isLoading']);

function submit() {
  form.clearErrors();
  emit('isLoading', true);

  router.post(
    '/',
    { filters: form },
    {
      onFinish: () => emit('isLoading', false),
      onError: (e) => form.setError(e),
    }
  );
}
</script>

<style scoped lang="scss">
.form {
  .form {
    &__input {
      &--number {
        width: 100%;
      }

      &--price {
        flex-grow: 1;
      }
    }

    &__price {
      display: flex;
      width: 100%;
      gap: 10px;
    }

    &__footer {
      display: flex;
      justify-content: end;

      @media screen and (max-width: 1280px) {
        justify-content: center;
      }
    }
  }
}
</style>
