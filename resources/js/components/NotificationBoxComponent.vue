<template>
  <a :href="route">
    <div v-if="img" class="notif-img">
      <img :src="img" :alt="img">
    </div>
    <div v-else>
      <i :class="icon"></i>
    </div>
    <div class="notif-content">
      <span class="block">{{ title }}</span>
      <span class="time">{{ time }}</span>
    </div>
  </a>
</template>

<script>
export default {
  props: {
    title: String,
    icon: String,
    time: String,
    route: String,
    img: String,
    class: String
  }
};
</script>
