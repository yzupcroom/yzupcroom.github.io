<template>
    <div class="q-gutter-md" style="max-width: 300px">
      <q-select
        label="Year"
        :options="year"
      />
      <q-select
        label="Month"
        :options="month"
      />
    </div>
</template>

<script>

export default {
  data: () => ({
    name: "query",
  })
}

</script>
