<template>
  <Head title="Properties | Web Developer Test" />

  <div class="common-layout">
    <ElContainer>
      <ElHeader>
        <h1 style="text-align: center">Properties</h1>
      </ElHeader>

      <ElMain>
        <FiltersForm />

        <ElDivider />

        <DataTable />
      </ElMain>
    </ElContainer>
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import { ElContainer, ElDivider, ElHeader, ElMain } from 'element-plus';
import FiltersForm from './Filters/FiltersForm.vue';
import DataTable from './Data/DataTable.vue';

defineProps({ properties: Object });
</script>
