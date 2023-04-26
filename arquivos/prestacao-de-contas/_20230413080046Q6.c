#include <stdio.h>

void main(){
    int num;
    double perc, i, cont;

    num = 1;
    cont = 0;
    i = 0;

    while (num > 0){

        printf("Insira o número: ");
        scanf("%d", &num);

        if (num == 0){
            break;
        }

        if (num >= 10 && num <= 20){
            cont+=1;
        }

            i+=1;
    }
    perc = (cont/i)*100;
    printf("%.0lf de %.0lf = %.2lf%%", cont, i, perc);
}
