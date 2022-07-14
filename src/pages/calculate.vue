
<template>
  <div class="q-pa-md">
    <div class="q-gutter-md" style="max-width: 300px">
      <q-form ref="form" greedy class="q-gutter-y-md" @submit="onSubmit" @keydown.enter.prevent >
      <q-input outlined v-model="form.give" label="學校給的錢" lazy-rules
        :rules="[val => !!val || '必填', val => val >= 10000 || '學校給的錢必須大於10000']" />
      <q-input outlined v-model="form.hour" label="時數" lazy-rules
        :rules="[val => !!val || '必填', val => val >= 0 || '時數必須大於0']" />
      <q-input outlined v-model="form.percent" label="趴數" lazy-rules
        :rules="[val => !!val || '必填', val => val >= 0 && val <= 100 || '趴數必須在0~100之間']" />
      <q-btn outlined label="計算"  flat type="submit" color="primary"/>
    </q-form>
      <q-input outlined type="textarea" v-model="res.data" readonly="readonly" label="備註" />
    </div>
  </div>
</template>

<script>
import { copyToClipboard } from 'quasar'
export default {
  data: () => ({
    form: {
      percent: '',
      give: '',
      hour: '',
    },
    res: {
      data: '',
    }
  }),
  computed: {
  },
  methods: {
    getForm() {
      return {
        percent: this.form.percent,
        give: this.form.give,
        hour: this.form.hour,
        t: this.form.t
      }
    },
    async onSubmit() {
        var F = this.getForm()
        var unitSal = 168
        var percent = F.percent / 100
        var doSalary = F.hour * unitSal
        var give = F.give
        var hour = F.hour
        var health = Math.round((give - doSalary) * percent)
        var getSalary = doSalary + health;
        var returnSalary = give - getSalary;
        var month = new Date().getMonth();

        if (returnSalary >= 0) {
          var RET = month + "月份時數: " + hour + " 小時\n";
          RET += "學校發 *" + give + "* 元\n";
          RET += "實領 *" + getSalary + "* 元\n";
          RET += "需退回 *" + returnSalary + "* 元\n";
        }
        else {
          var RET = month + "月份時數: " + hour + " 小時\n";
          RET += "學校發 *" + give + "* 元\n";
          RET += "實領 *" + getSalary + "* 元\n";
          RET += "需補上 *" + returnSalary * (-1) + "* 元\n";
        }

        this.res.data = RET;
        copyToClipboard(RET)
    },
  }
}
</script>
