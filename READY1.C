#include"header.h"

void first(void);
int main()
{

int i,j,a,score=0;
int enter;
char h[3]={'_','_','_' };
char word,ch,p;
char char1[3][4]={"hat","cat","rat"};
do
{

a=0;
i=0;
j=0;
clrscr();
	first();
	start:
	clrscr();
	title();            //title of hangman

      printf("                                               \n\t\tP:PLAY \n\t\tI:INSTRUCTIONS \n\t\tC:CREDITS \n\t\tQ:QUIT ");
     ch=getche();
switch(ch)
{
case 'p':
clrscr();

      printf("\n\n\n\n\n\n\n\n\n\n\n\t\t\t\t LOADING ");
      delay(500);                      //look of loading
      printf("..");

      delay(500);                    //time
      printf("..");

      delay(500);
      printf("..");

      delay(500);
      printf("...");

      clrscr();
    title();
      printf("\t\t\t  \n");
      printf("\t\t\t      \n");
      printf("\t\t\t      0 \n");
      printf("\t\t\t     \\|/\n");
      printf("\t\t\t      | \n");          //hangman
      printf("\t\t\t     / \\\n");
      printf("\t         CAN YOU SAVE ME PLESASE ?  \n\n");   //inner look of play another menu
printf("\n\t\t a: 3 LETTERS GAME \n\t\t b:MAIN MENU \n\n\t\t choice = ");

p=getche();
switch(p)
{



case 'a':
clrscr();
for(i=0;i<=5;i++)
{
enter=0;
a=2;
h[0]='_';
h[1]='_';
h[2]='_';
printf("\n\n\t\t\t welcome to %d lvl of game",i+1);
for(j=0;j<=2;j++)
{
enter=0;
printf("\n%c %c %c ",h[0],h[1],h[2]);
printf("\n\n ENTER A LATTER ");
word=getche();
if(word>=41&&word<=90)
word=word+32;

if(char1[i][0]==word)
{
enter=1;
h[0]=word;
}
if(char1[i][1]==word)
{
enter=1;
h[1]=word;
}
if(char1[i][2]==word)
{
enter=1;
h[2]=word;
}

if(enter==1)
{
printf("\n\nGOOD NEXT");
score++;
printf("\n\t\t\tScore=%d",score);
}
else
{
printf("\n\nTry Again !");
a++;
j--;
hangman(a,score);
}

if(a==5)                      //if hangman 5th steps return
  {
   clrscr();
 printf("\n\n\n\n\n\n\n\n\n\n\n\t\t\t\t TOTAL SCORE : %d ",score);
      delay(500);
    clrscr();
 printf(" ");
      delay(500);
      clrscr();
 printf("\n\n\n\n\n\n\n\n\n\n\n\t\t\t\t TOTAL SCORE : %d ",score);
      delay(500);
    clrscr();
 printf(" ");
      delay(500);
	     clrscr();
 printf("\n\n\n\n\n\n\n\n\n\n\n\t\t\t\t TOTAL SCORE : %d ",score);
      delay(1000);
  clrscr();
return 0;
}
}
}
break;

case 'b':
goto start;

case 'c':
clrscr();
printf("\n\n\n\n\n\n\n\t\t\t\tINVALID SELECTION!!!");
delay(100);
return 0;


}

case 'i':
	inst();
	break;

case 'c':
	credits();
	break;

case 'q':
{
clrscr();
printf("\n\n\n\n\n\t\t\t\t\t QUITING...");
return 0;
}
}


} while(ch);
return 0;
}


void first(void)
{
		int i,b;
	for(i=0;i<=9;i++)
	{
		system("cls");
	b=0;
	while(b!=i)
	{
	printf("    \n");
	b++;
	}
	   printf("\t            |   |  /\\   |\\  | /----  |\\  /|   /\\   |\\  |\n");
	   printf("\t            |---| /--\\  | \\ | |  __  | \\/ |  /--\\  | \\ |\n");
	   printf("\t            |   |/    \\ |  \\| | ___| |    | /    \\ |  \\|\n");
	printf("\t           ______________________________________________\n");
	printf("\t           ______________________________________________\n");
		delay(160);
	}
		   printf("\n\n\n                              WELCOME TO THE GAME SIR  !!!                        ");
	   printf("\n \n              \t        HINT : YOU HAVE TO THING VERY COMMON WORDS\n");
	   delay(1500);
	   clrscr();
		printf("\n\n\n\n\n\n\n\n\n\n\n\t\t\t\t LOADING ");
      delay(500);                      //look of loading
      printf("..");

      delay(500);                    //time
      printf("..");

      delay(500);
      printf("..");

      delay(500);
      printf("...");
 }

