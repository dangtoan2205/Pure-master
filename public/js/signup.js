// rules: {
//     name: {
//         required: true,
//         maxlength: 15
//     },
//     email: {
//         required: true,
//         email: true
//     },
//     password: {
//         required: true,
//         validatePassword: true,
//         minlength: 6
//     },
//     phone: "required",
//     address: "required",
// },
// messages: {
//     name: {
//         required: "Vui lòng nhập tên của bạn",
//         maxlength: "Nhập tối đa 15 kí tự"
//     },
//     email: {
//         required: "Vui lòng nhập email của bạn",
//         email: "Eamil không đúng định dạng!!"
//     },
//     password: {
//         required: "Vui lòng nhập mật khẩu của bạn"
//     },
//     phone: {
//         required: "Vui lòng nhập số điện thoại của bạn"
//     },
//     address: {
//         required: "Vui lòng nhập địa chỉ của bạn"
//     },
// },


// submitHandler: function(form) {
//     form.submit();
// }
// });
// $.validator.addMethod("validatePassword", function(value, element) {
// return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,16}$/i.test(value);
// }, "Hãy nhập password từ 6 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số");