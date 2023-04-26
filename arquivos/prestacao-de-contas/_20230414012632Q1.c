#include <stdio.h>


void main (){

    int num, mid, i;

    printf("Número: ");
    scanf("%d", &num);

    mid = num/2;

    for (i=1; i<=mid; i++){
        printf("%d\n", i);
    }
    printf("metade\n");
    for (i=mid+1; i<=num; i++){
        printf("%d\n", i);
    }

}
