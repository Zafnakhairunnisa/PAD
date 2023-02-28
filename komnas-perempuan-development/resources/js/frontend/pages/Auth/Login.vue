<template>
  <a-row>
    <a-col :sm="24" :lg="12" :xl="12" class="left-side">
      <div>
        <div class="logo">
          <img class="logo-image" :src="images.LOGO" alt="Logo" />
          <div class="logo-title">
            <span>DP3AP2 DIY</span>
            <span
              >DINAS PEMBERDAYAAN PEREMPUAN PERLINDUNGAN ANAK DAN PENGENDALIAN
              PENDUDUK YOGYAKARTA</span
            >
          </div>
        </div>
      </div>
      <div>
        <a-typography-title
          >Selamat<br />
          datang di portal Data Profil Anak</a-typography-title
        >
        <a-typography-text
          >Silakan masukkan data yang dibutuhkan untuk dapat
          login!</a-typography-text
        >
      </div>
    </a-col>

    <a-col :sm="24" :lg="12" :xl="12" class="right-side">
      <a-form :model="form" autocomplete="off" @finish="onFinish">
        <label for="">Email</label>
        <a-form-item
          title="Email"
          :rules="[
            {
              required: true,
              email: true,
              message: 'Please input your email!',
            },
          ]"
        >
          <a-input
            placeholder="Your email"
            v-model:value="form.email"
            size="large"
          />
        </a-form-item>
        <label for="">Password</label>
        <a-form-item
          title="Password"
          :rules="[
            {
              required: true,
              message: 'Please input your password!',
            },
          ]"
        >
          <a-input-password
            placeholder="Your password"
            v-model:value="form.password"
            size="large"
          />
        </a-form-item>
        <a-form-item>
          <a-button type="primary" block html-type="submit" size="large"
            >Login</a-button
          >
        </a-form-item>
      </a-form>
    </a-col>
  </a-row>
</template>

<script>
import { defineComponent } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { images } from "@fe/utils";

export default defineComponent({
  setup() {
    const form = useForm({
      email: "",
      password: "",
    });

    const onFinish = () => {
      form.post(route("frontend.auth.login"));
    };

    return { form, onFinish, images };
  },
});
</script>

<style scoped>
.left-side {
  display: flex;
  height: 100vh;
  background-color: #43140f;
  flex-direction: column;
  justify-content: space-between;
  padding: 24px 120px;
}
.left-side * {
  color: white !important;
}
.left-side h1 {
  font-size: 5rem;
  font-weight: bold;
  margin-bottom: 0.15em !important;
}
.left-side span {
  font-size: 1.75rem;
  font-weight: 600;
  color: lightgray !important;
}
.right-side {
  display: flex;
  height: 100vh;
  flex-direction: column;
  justify-content: center;
  padding: 16px 120px;
}
.right-side form {
  display: block;
  width: 100%;
}
.right-side label {
  display: flex;
  margin-bottom: 8px !important;
  font-weight: 500;
}

@media only screen and (max-width: 576px) {
  .left-side {
    padding: 24px 120px 48px;
    justify-content: start;
    gap: 36px;
    height: fit-content;
  }
  .left-side h1 {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 0.75rem !important;
  }
  .left-side span {
    font-size: 1rem;
    font-weight: 600;
    color: lightgray !important;
  }
  .right-side {
    height: fit-content;
    padding: 48px 120px;
  }
}

@media only screen and (max-width: 992px) {
  .left-side {
    padding: 24px 120px 48px;
    justify-content: start;
    gap: 36px;
    height: fit-content;
  }
  .left-side h1 {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 0.75rem !important;
  }
  .left-side span {
    font-size: 1rem;
    font-weight: 600;
    color: lightgray !important;
  }
  .right-side {
    align-content: center;
    height: 100%;
    padding: 96px 120px;
  }
}

@media only screen and (max-width: 1200px) {
  .left-side {
    padding-left: 72px;
    padding-right: 72px;
  }
  .left-side h1 {
    font-size: 3rem;
    font-weight: bold;
    margin-bottom: 0.75rem !important;
  }
  .left-side span {
    font-size: 1rem;
    font-weight: 600;
    color: lightgray !important;
  }
}

@media only screen and (max-width: 1600px) {
  .left-side {
    padding-left: 72px;
    padding-right: 72px;
  }
  .left-side h1 {
    font-size: 4rem;
    font-weight: bold;
    margin-bottom: 0.75rem !important;
  }
  .left-side span {
    font-size: 1.5rem;
    font-weight: 600;
    color: lightgray !important;
  }
}

.logo {
  float: left;
  height: 50px;
  display: flex;
}
.logo-title {
  margin-left: 10px;
  display: flex;
  flex-direction: column;
  color: #000;
  max-width: 225px;
  line-height: normal;
}
.logo-title span:first-child {
  font-size: 16px;
  font-weight: 600;
}

.logo-title span:last-child {
  font-size: 8px;
}
</style>