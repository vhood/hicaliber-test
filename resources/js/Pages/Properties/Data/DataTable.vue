<template>
  <ElCard class="box-card">
    <ElTable :data="properties" stripe>
      <ElTableColumn prop="name" label="Name" />
      <ElTableColumn prop="price" label="Price" />
      <ElTableColumn prop="bedrooms" label="Bedrooms" />
      <ElTableColumn prop="bathrooms" label="Bathrooms" />
      <ElTableColumn prop="storeys" label="Storeys" />
      <ElTableColumn prop="garages" label="Garages" />
    </ElTable>
  </ElCard>
</template>

<script setup>
import { ElTable, ElCard, ElTableColumn } from 'element-plus';

defineProps({ properties: Array });
</script>
