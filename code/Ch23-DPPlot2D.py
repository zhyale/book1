import numpy as np 
import seaborn as sns  
import matplotlib.pyplot as plt  


def get_noisy_digit(GSf, epsilon):
    beta = GSf/epsilon
    u = np.random.random()-0.5
    noisy_digit = 0.0 - beta * np.sign(u) * np.log(1.0 - 2 * np.abs(u))
    return np.rint(noisy_digit)

if __name__ =='__main__':    
    GSf = 12
    epsilon = 1
    output = []
    for i in range(1000):
        result = [5000, 50]
        result[0] += get_noisy_digit(GSf, epsilon)
        result[1] += get_noisy_digit(GSf, epsilon)
        output.append(result[0])
    sns.set(style="white", palette="muted", color_codes=True)    
    sns.distplot(output)
    plt.show()  
