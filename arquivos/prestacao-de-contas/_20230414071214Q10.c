#include <stdio.h>

void main(){

    int nota = 0, matricula = 0, sumAlu = 0, sumTur = 0, contador = 0;
    float medAlu, medTur;

    printf("Matrícula: ");
    scanf("%d", &matricula);
    while(matricula != 0){
        medAlu = 0;
        sumAlu = 0;
        for(int i=1; i<11; i++){
            printf("Nota %d: ", i);
            scanf("%d", &nota);
            sumAlu += nota;
            contador += 1;
        }
        medAlu = sumAlu / (float)10;
        printf("Matrícula %d, Média de %.1f \n", matricula, medAlu);
        sumTur += sumAlu;
        printf("Matrícula: ");
        scanf("%d", &matricula);
    }

    medTur = sumTur / (float)contador;
    printf("Média da turma: %.1f \n", medTur);
}
