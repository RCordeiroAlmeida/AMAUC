#include <stdio.h>
#include <stdlib.h>
#include <string.h>

void main (){

    int num1, num2, res;
    char op;

    printf("OPERACAO: ");
    scanf("%c", &op);

    printf("NUMERO 1: ");
    scanf("%d", &num1);

    printf("NUMERO 2: ");
    scanf("%d", &num2);


    switch(op){
        case '+':
            res = num1+num2;
            printf("%d + %d = %d", num1, num2, res);aw
            break;
        case '-':
            res = num1-num2;
            printf("%d - %d = %d", num1, num2, res);
            break;
        case '*':
            res = num1*num2;
            printf("%d * %d = %d", num1, num2, res);
            break;
        case '/':
            res = num1/num2;
            printf("%d / %d = %d", num1, num2, res);
            break;
        default:
            printf("Finalizado\n");
            exit(0);
    }
}

