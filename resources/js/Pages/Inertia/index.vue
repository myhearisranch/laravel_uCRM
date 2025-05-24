<script setup>
</script>
<template>
  <div v-if="$page.props.flash.message" class="bg-blue-300">
    {{ $page.props.flash.message }}
  </div>
  <!-- ファイル名がindex.vueだと何も表示されず、
  遷移もしなかった -->
  ああああ
</template>