<template>
  <div class="q-pa-md">
    <div class="q-gutter-md" style="max-width: 300px">
      <q-form ref="form" greedy class="q-gutter-y-md" @submit="onSubmit" @keydown.enter.prevent>
        <q-select v-model="form.y" label="Year" :options="year" option-label="label" option-value="value"
          option-disable="inactive" emit-value map-options />
        <q-select v-model="form.m" label="Month" value="form.m" :options="month" option-label="label"
          option-value="value" option-disable="inactive" emit-value map-options />
        <q-btn outlined  color="black"  label="查詢" flat type="submit"  />
      </q-form>
    </div>
  </div>
</template>

<script>
var todayYear = (new Date().getFullYear()).toString();
var todayMonth = (new Date().getMonth() + 1).toString();
export default {
  data: () => ({
    name: "query",
    form: {
      m: todayMonth,
      y: todayYear
    },
    year: [
      { label: todayYear, value: todayYear },
      { label: todayYear - 1, value: todayYear - 1 },
      { label: todayYear - 2, value: todayYear - 2 },
    ],
    month: [
      { label: "Jan", value: "1" },
      { label: "Feb", value: "2" },
      { label: "Mar", value: "3" },
      { label: "Apr", value: "4" },
      { label: "May", value: "5" },
      { label: "Jun", value: "6" },
      { label: "Jul", value: "7" },
      { label: "Aug", value: "8" },
      { label: "Sep", value: "9" },
      { label: "Oct", value: "10" },
      { label: "Nov", value: "11" },
      { label: "Dec", value: "12" }
    ]
  }),
  methods: {
    getYM() {
      return {
        y: this.form.y,
        m: this.form.m
      }
    },
    onSubmit() {
      const F = this.getYM();
      // 串接api -> query.php
      // param= F
    }
  }
}

</script>
