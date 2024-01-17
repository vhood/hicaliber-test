<template>
  <Head title="Properties | Web Developer Test" />

  <div class="common-layout">
    <ElContainer>
      <ElHeader>
        <h1 class="header">Properties</h1>
      </ElHeader>

      <ElContainer class="page">
        <ElAside class="page__aside el-main">
          <FiltersForm @isLoading="changeIsLoading" />
        </ElAside>

        <ElMain>
          <DataTable :properties="properties" :isLoading="isLoading" />
        </ElMain>
      </ElContainer>
    </ElContainer>
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import { ElAside, ElContainer, ElHeader, ElMain } from 'element-plus';
import { ref } from 'vue';
import FiltersForm from './Filters/FiltersForm.vue';
import DataTable from './Data/DataTable.vue';

defineProps({
  properties: {
    type: Array,
    required: true,
  },
});

const isLoading = ref(false);
function changeIsLoading(value) {
  isLoading.value = Boolean(value);
}
</script>

<style scoped lang="scss">
.header {
  text-align: center;
}

.page {
  .page__aside {
    margin-right: -20px;
    min-width: 450px;
    max-width: 450px;

    @media screen and (max-width: 1280px) {
      margin-right: 0px;
      min-width: 0px;
      max-width: 100%;
    }
  }

  @media screen and (max-width: 1280px) {
    flex-wrap: wrap;
  }
}
</style>
