import { defineStore } from "pinia";
import { ref } from "vue";
import { snakeToCamelObj } from "@/utils/services";
import { STORE_PERSISTENT_KEYS, HostingerToolsData } from "@/types";

export const useGeneralStoreData = defineStore(
  "generalStoreData",
  () => {
    const toolsData = ref<HostingerToolsData>(
      // @ts-ignore
      snakeToCamelObj(hostinger_tools_data)
    );

<<<<<<< HEAD
=======
    console.log("toolsData", toolsData);

>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
    return {
      ...toolsData.value,
    };
  },
  {
    persist: { key: STORE_PERSISTENT_KEYS.TOOLS_GENERAL_DATA_STORE },
  }
);
