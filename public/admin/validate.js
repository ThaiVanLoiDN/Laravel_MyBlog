$( document ).ready( function () {
	$( "#ads" ).validate( {
		
		rules: {
			name: {
				required: true,
				minlength: 5,
				maxlength: 100,
			},
			link: {
				required: true,
				minlength: 10,
				maxlength: 100,
			},			
		},
		messages: {
			name: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 5 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			link: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 10 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
		},
	});

	$( "#category" ).validate( {
		
		rules: {
			name: {
				required: true,
				minlength: 10,
				maxlength: 100,
			},
		},
		messages: {
			name: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 10 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
		},
	});

	$( "#info" ).validate( {
		
		rules: {
			name: {
				required: true,
				minlength: 5,
				maxlength: 100,
			},
			value: {
				required: true,
				minlength: 10,
				maxlength: 100,
			},			
		},
		messages: {
			name: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 5 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			value: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 10 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
		},
	});

	$( "#post" ).validate( {
		ignore: [], 
		debug: false,
		rules: {
			title: {
				required: true,
				minlength: 5,
				maxlength: 100,
			},
			category_id: {
				required: true,
				number: true,
				digits: true
			},
			description: {
				required: true,
				minlength: 10,
				maxlength: 100000,
			},	
			content: {
				required: true,
				minlength: 10,
				maxlength: 100000,
			},			
		},
		messages: {
			title: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 5 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			category_id: {
				required: "Vui lòng nhập vào đây",
				number: "Vui lòng chọn giá trị số nguyên dương",
				digits: "Vui lòng chọn giá trị số nguyên dương",
			},
			description: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 10 ký tự",
				maxlength: "Vui lòng nhập tối đa 100000 ký tự",
			},
			content: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 10 ký tự",
				maxlength: "Vui lòng nhập tối đa 100000 ký tự",
			},
		},
	});

	$( "#project" ).validate( {
		
		rules: {
			name: {
				required: true,
				maxlength: 100,
			},
			link: {
				required: true,
				maxlength: 100,
			},	
			time: {
				required: true,
				minlength: 10,
				maxlength: 100,
			},
			description: {
				required: true,
				minlength: 10,
				maxlength: 100000,
			},		
		},
		messages: {
			name: {
				required: "Vui lòng nhập vào đây",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			link: {
				required: "Vui lòng nhập vào đây",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			time: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 10 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			description: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 10 ký tự",
				maxlength: "Vui lòng nhập tối đa 100000 ký tự",
			},
		},
	});

	$( "#quotes" ).validate( {
		
		rules: {
			author: {
				required: true,
				minlength: 10,
				maxlength: 100,
			},
			content: {
				required: true,
				minlength: 10,
				maxlength: 100000,
			},		
		},
		messages: {
			author: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 10 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			content: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 10 ký tự",
				maxlength: "Vui lòng nhập tối đa 100000 ký tự",
			},
		},
	});

	$( "#skill" ).validate( {
		
		rules: {
			name: {
				required: true,
				minlength: 10,
				maxlength: 100,
			},
			percent: {
				required: true,
				number: true,
				digits: true
			},	
		},
		messages: {
			name: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 10 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			percent: {
				required: "Vui lòng nhập vào đây",
				number: "Vui lòng chọn giá trị số nguyên dương",
				digits: "Vui lòng chọn giá trị số nguyên dương",
			},
		},
	});

	$( "#slider" ).validate( {
		
		rules: {
			name: {
				required: true,
				minlength: 10,
				maxlength: 100,
			},
			link: {
				required: true,
				minlength: 10,
				maxlength: 100,
			},	
			description: {
				required: true,
				minlength: 10,
				maxlength: 100000,
			},		
		},
		messages: {
			name: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 10 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			link: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 10 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			description: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 10 ký tự",
				maxlength: "Vui lòng nhập tối đa 100000 ký tự",
			},
		},
	});

	$( "#work" ).validate( {
		
		rules: {
			name: {
				required: true,
				minlength: 10,
				maxlength: 100,
			},
			time: {
				required: true,
				minlength: 10,
				maxlength: 100,
			},	
			description: {
				required: true,
				minlength: 10,
				maxlength: 100000,
			},		
		},
		messages: {
			name: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 10 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			time: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 10 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			description: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 10 ký tự",
				maxlength: "Vui lòng nhập tối đa 100000 ký tự",
			},
		},
	});

	$( "#user" ).validate( {
		
		rules: {
			username: {
				required: true,
				minlength: 3,
				maxlength: 100,
			},
			fullname: {
				required: true,
				minlength: 3,
				maxlength: 100,
			},	
			email: {
				required: true,
				email: true,
				minlength: 10,
				maxlength: 100,
			},
			password: {
				required: true,
				minlength: 6,
				maxlength: 100,
			},	
			repassword: {
				required: true,
				minlength: 6,
				maxlength: 100,
				equalTo: "#password",
			},	
			role: {
				required: true,
				number: true,
				digits: true
			},	
		},
		messages: {
			username: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 3 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			fullname: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 3 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			email: {
				required: "Vui lòng nhập vào đây",
				email: "Vui lòng nhập đúng định dạng email",
				minlength: "Vui lòng nhập tối thiểu 10 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			password: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 6 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			repassword: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 6 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
				equalTo: "Vui lòng nhập trùng mật khẩu bên cạnh",
			},
			role: {
				required: "Vui lòng nhập vào đây",
				number: "Vui lòng chọn giá trị số nguyên dương",
				digits: "Vui lòng chọn giá trị số nguyên dương",
			},
		},
	});

	$( "#userEdit" ).validate( {
		
		rules: {
			username: {
				required: true,
				minlength: 3,
				maxlength: 100,
			},
			fullname: {
				required: true,
				minlength: 3,
				maxlength: 100,
			},	
			email: {
				required: true,
				email: true,
				minlength: 10,
				maxlength: 100,
			},
			password: {
				minlength: 6,
				maxlength: 100,
			},	
			repassword: {
				minlength: 6,
				maxlength: 100,
				equalTo: "#password",
			},	
			role: {
				required: true,
				number: true,
				digits: true
			},	
		},
		messages: {
			username: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 3 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			fullname: {
				required: "Vui lòng nhập vào đây",
				minlength: "Vui lòng nhập tối thiểu 3 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			email: {
				required: "Vui lòng nhập vào đây",
				email: "Vui lòng nhập đúng định dạng email",
				minlength: "Vui lòng nhập tối thiểu 10 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			password: {
				minlength: "Vui lòng nhập tối thiểu 6 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
			},
			repassword: {
				minlength: "Vui lòng nhập tối thiểu 6 ký tự",
				maxlength: "Vui lòng nhập tối đa 100 ký tự",
				equalTo: "Vui lòng nhập trùng mật khẩu bên cạnh",
			},
			role: {
				required: "Vui lòng nhập vào đây",
				number: "Vui lòng chọn giá trị số nguyên dương",
				digits: "Vui lòng chọn giá trị số nguyên dương",
			},
		},
	});
});