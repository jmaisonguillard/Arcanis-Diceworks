<template>
  <Card class="flex flex-col items-center justify-center">
      <h3 class="text-lg font-bold mb-4">Low Stock Products</h3>

      <ul>
          <li v-for="product in card.products" :key="product.name" class="mb-2">
              {{ product.name }} - Stock: {{ product.stock_quantity }}
          </li>
      </ul>
  </Card>
</template>

<script>
export default {
  props: [
    'card',

    // The following props are only available on resource detail cards...
    // 'resource',
    // 'resourceId',
    // 'resourceName',
  ],

  mounted() {
  },
}
</script>
