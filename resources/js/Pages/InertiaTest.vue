<script setup>
import { Link } from '@inertiajs/vue3'
// import {Link} from '@inertiajs/inertia-vue3';
</script>

<template>
  Ineritaテストです<br>
  <a href="/">aタグ経由です</a><br>
  <Link href="/">Link経由です</Link><br>
  <Link v-bind:href="route('inertia.index')">名前付きルートの確認です</Link>
</template>