#!/bin/bash

algorithm=cast5
file=ncut-book-store.ini

operation=$1

continue_if_file_exist() {
	file=$1

	if [ -f $file ]
	then
		return
	fi

	echo_and_exit $file does not exist.
}

echo_and_exit() {
	echo $*
	exit
}

main() {
	algorithm=$2
	decrypted_file=$3
	encrypted_file=$decrypted_file.$algorithm

	case $1 in
		decrypt)
			continue_if_file_exist $encrypted_file
			operation=d
			input_file=$encrypted_file
			output_file=$decrypted_file
			;;
		encrypt)
			continue_if_file_exist $decrypted_file
			operation=e
			input_file=$decrypted_file
			output_file=$encrypted_file
			;;
		*)
			echo_and_exit settings.sh only accepts encrypt or decrypt.
	esac

	openssl $algorithm-cbc \
		-$operation \
		-in $input_file \
		-out $output_file
}

main $operation $algorithm $file
