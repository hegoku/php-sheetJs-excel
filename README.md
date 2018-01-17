### PHP配合SheetJS/js-xlsx导出Excel大量数据

[https://www.dragonballsoft.cn/archives/58.html](https://www.dragonballsoft.cn/archives/58.html)

一般使用PHP导出Excel表格都会用PHPExcel，但是当遇到要导出大量数据时，就会导致超时，内存溢出等问题。因此在项目中放弃使用这种方式，决定采用前段生成Excel的方式来解决问题，步骤如下：

1. 前端ajax先请求一次后端，获取总的数据个数，假设有1000条
2. 然后前端分10次，每次100条ajax请求后台数据，
3. 10次ajax都请求成功后（这里使用[Promise.all()](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Promise/all)来处理多次异步请求），将数据合并在一个数组里
4. 使用 [SheetJS/js-xlsx](https://github.com/SheetJS/js-xlsx) 生成Excel文件并下载


**这种方案额外的好处：**

1. 用户体验友好，前端可以用进度条来展示10次请求的百分比
2. 后台不用额外提供导出Excel的接口，只需要使用查询数据的接口，因为一般查询数据的接口都会有：结果里包含总个数字段、分页查询功能，因此前端只需按上述逻辑调用数据查询接口合并数据即可

**效果如下:**

![demo.gif](https://www.dragonballsoft.cn/usr/uploads/2018/01/2110612983.gif)
