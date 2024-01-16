<template>
  <ElCard class="box-card">
    <ElTable v-if="properties.length > 0" :data="properties" stripe v-loading="isLoading">
      <ElTableColumn prop="name" label="Name" />
      <ElTableColumn prop="price" label="Price" />
      <ElTableColumn prop="bedrooms" label="Bedrooms" />
      <ElTableColumn prop="bathrooms" label="Bathrooms" />
      <ElTableColumn prop="storeys" label="Storeys" />
      <ElTableColumn prop="garages" label="Garages" />
    </ElTable>

    <ElEmpty v-else description="No properties found. Try changing filters." />
  </ElCard>
</template>

<script setup>
import { ElTable, ElCard, ElTableColumn, ElEmpty } from 'element-plus';

defineProps({
  properties: {
    type: Array,
    required: true,
  },
  isLoading: {
    type: Boolean,
    required: true,
  },
});
</script>
