import numpy as np 

def calc_proportion(epsilon, value, delta):
    return np.exp(epsilon * value / (2 * delta))

if __name__ =='__main__':   
    candidate = ['zhangsan', 'lisi', 'wangwu']
    vote_count = [49, 35, 15]
    epsilon = 0.1              # ε
    delta = 1                  # 敏感度
    proportion = []            # 所占份额
    result_probability = []    # 最终胜出的概率
    total_proportion = 0.0
    for i in range(len(candidate)):
        proportion.append(calc_proportion(epsilon, vote_count[i], delta))
        total_proportion += proportion[i]
    for i in range(len(candidate)):
        result_probability.append(proportion[i]/total_proportion)    
    print(result_probability)
