<template>
   <div class="card">
     <DataTable :value="products" sortMode="multiple" tableStyle="min-width: 50rem">
   
         <Column field="code" class="flex" header="Code" sortable style="width: 25%"></Column>

       <Column field="name" header="Name" sortable style="width: 25%"></Column>
       <Column field="category" header="Category" sortable style="width: 25%"></Column>
       <Column field="quantity" header="Quantity" sortable style="width: 25%"></Column>
     </DataTable>
   </div>
 </template>

 <style scoped>
   .flex {
      display: flex;
      align-items: center;
   }
 </style>
 
 <script setup>
 import { ref, onMounted } from 'vue';
 import DataTable from 'primevue/datatable';
 import Column from 'primevue/column';
 
 const products = ref([
   { code: 'zz21cz3c1', name: 'Blue Band', category: 'Fitness', quantity: 2 },
   { code: 'f230fh0g3', name: 'Bamboo Watch', category: 'Accessories', quantity: 24 },
   { code: '244wgerg2', name: 'Blue T-Shirt', category: 'Clothing', quantity: 25 },
   { code: 'nvklal433', name: 'Black Watch', category: 'Accessories', quantity: 61 },
   { code: 'h456wer53', name: 'Bracelet', category: 'Accessories', quantity: 0 },
 ]);
 </script>
 