<template>
  <Head title="Properties | Web Developer Test" />

  <div class="common-layout">
    <ElContainer>
      <ElHeader>
        <h1 style="text-align: center">Properties</h1>
      </ElHeader>

      <ElContainer class="page">
        <ElAside class="page__aside el-main">
          <FiltersForm />
        </ElAside>

        <ElMain>
          <DataTable :properties="properties" />
        </ElMain>
      </ElContainer>
    </ElContainer>
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import { ElAside, ElContainer, ElHeader, ElMain } from 'element-plus';
import FiltersForm from './Filters/FiltersForm.vue';
import DataTable from './Data/DataTable.vue';

defineProps({ properties: Array });
</script>

<style scoped lang="scss">
.page {
  .page__aside {
    margin-right: -20px;
    min-width: 450px;

    @media screen and (max-width: 1280px) {
      margin-right: 0px;
      min-width: 0px;
    }
  }

  @media screen and (max-width: 1280px) {
    flex-wrap: wrap;
  }
}
</style>
