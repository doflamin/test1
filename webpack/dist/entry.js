/*! 成哥所有，翻版必究! */
webpackJsonp([0],[
/* 0 */,
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

var _index = __webpack_require__(3);

var _index2 = _interopRequireDefault(_index);

var _common = __webpack_require__(4);

var _common2 = _interopRequireDefault(_common);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

// import $ from 'jquery';

var oDiv1 = document.getElementById("div1");
oDiv1.innerHTML = "hello world!!!";
var a = 5;
var add = function add(x, y) {
    return x + y;
};

var People = function People(name, age) {
    _classCallCheck(this, People);

    this.name = name;
    this.age = age;
};

$('#div6').html('test JQ123');
var json = __webpack_require__(5);

$('#json').html('\u4F5C\u8005\u662F:' + json.name + ', \u5E74\u9F84\u662F: ' + json.age + ', \u516C\u53F8\u662F: ' + json.company);
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(0)))

/***/ }),
/* 2 */,
/* 3 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 4 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 5 */
/***/ (function(module, exports) {

module.exports = {"name":"xiecheng","age":30,"company":"weichuang"}

/***/ })
],[1]);