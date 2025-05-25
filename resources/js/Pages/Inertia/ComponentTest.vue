<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Lavel from '@/Components/InputLabel.vue';
import Input from '@/Components/TextInput.vue';

const emitTest = (e) => {
  console.log(e)
};

</script>

<template>
  <GuestLayout>
    <Lavel value="件名">タイトル</Lavel>
    <!-- 親の方で実行したいメソッドを書いていく -->

    <!-- 子供の方のinputタグの情報を親の方でconsole.logで実行している -->
     <!-- 子供の方:
          defineEmits: 子から親へ変数を渡す時に使う
          defineEmits(['update:modelValue']);
          const input = ref(null);

          <template>
              <input
                  class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                  :value="modelValue"
                  @input="$emit('update:modelValue', $event.target.value)"
                  ref="input"
              />
          </template>
      -->
    <Input 
      model-value="初期値が入ります"
      @update:modelValue="emitTest"
    ></Input>
  </GuestLayout>
</template>

<!-- defineEmitsのデータの流れ:
1. 親コンポーネントが子コンポーネントに model-value プロパティ（初期値）を渡す。

    親コンポーネント:
    <template>
      <Input
        model-value="初期値が入ります"  @update:modelValue="emitTest"
      ></Input>
    </template>

    子コンポーネント:
    <script setup>
    defineProps(['modelValue']); // この行で親から渡された `modelValue` プロパティを受け取ることを宣言
    // ...
    </script>

    <template>
      <input
        :value="modelValue"  class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
      />
    </template>

2. 子コンポーネントの input タグにユーザーが文字を入力する。

3. input タグで input イベントが発生し、そのイベント内で子コンポーネントがカスタムイベント（update:modelValue）を発火する。
    <script setup>
    // ...
    defineEmits(['update:modelValue']); //この行で `update:modelValue` というカスタムイベントを発火することを宣言
    // ...
    </script>

    <template>
      <input
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"  class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        ref="input"
      />
    </template>

4. 子コンポーネントが発火したカスタムイベントを、親コンポーネントが @update:modelValue="emitTest" で「待ち受けている」。
   親コンポーネント:
   <template>
    <Input
      model-value="初期値が入ります"
      @update:modelValue="emitTest"  ></Input>
  </template>

5. 親コンポーネントの emitTest メソッドが実行され、子コンポーネントから渡された値が引数 e として受け取られ、console.log(e) で表示される。 
   <script setup>
      // ...
      const emitTest = (e) => { // 子から送られてきた値が引数 `e` として渡される
        console.log(e);        //  その値がコンソールに表示される
      };
   </script>

簡単に言うと、、、
入力した値 ($event.target.value)　-> $emit (子コンポーネントのメソッド)　-> update:modelValue (カスタムイベント名)　-> emitTest (親コンポーネントのメソッド)　-> e (親コンポーネントの変数)
-->