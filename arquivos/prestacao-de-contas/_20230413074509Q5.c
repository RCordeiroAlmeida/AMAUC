#include <stdio.h>

void main (){
    int num, res, i;

    printf("Numero: ");
    scanf("%d", &num);

    res = num;

    for(i=num-1; i>1; i--){
        res = res*i;
    }
    printf("%d", res);

}
