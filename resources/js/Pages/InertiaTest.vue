<script setup>
  //<Link href="/">を使うのに必要
  import { Link } from '@inertiajs/vue3'
</script>

<template>
  Inertiaテストです。<br>
  <a href="/">aタグ経由です</a><br>
  <Link href="/">Link経由です</Link>
  <Link :href="route('inertia.index')">名前付きルート</Link>
</template>